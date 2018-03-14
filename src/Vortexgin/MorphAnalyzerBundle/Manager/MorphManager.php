<?php

namespace Vortexgin\MorphAnalyzerBundle\Manager;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\ProcessBuilder;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Vortexgin\MorphAnalyzerBundle\Model\LemmaTag;
use Vortexgin\MorphAnalyzerBundle\Model\Morph;

class MorphManager
{

    private $_morphind;

    public function __construct()
    {
        $basePath = realpath(dirname(__FILE__)).'/../../../../';
        $this->_morphind = $basePath.'bin/morphind.v.1.4/MorphInd.pl';
    }

    public function analyze($word)
    {
        try{
            $command = 'echo "'.$word.'" | perl '.$this->_morphind;
            $process = new Process($command);
            $process->run();

            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            $output = $process->getOutput();
            $return = $this->extract($output);

            return array(
                'word' => $word,
                'morph' => $return,
            );
        } catch(ProcessFailedException $e) {
            return false;
        }catch(\Exception $e){
            return false;
        }
    }

    public function extract($morph)
    {
        try{
            $regexp = '\^(.*?)\$';
            if (!preg_match_all("/$regexp/si", $morph, $matches)) {
                return false;
            }

            $structure = $matches[1];
            $morph = $this->morph($structure);

            return $morph;
        }catch(\Exception $e){
            return false;
        }
    }

    private function morph($structure)
    {
        try {
            $return = array();
            foreach ($structure as $key=>$morphWord) {
                $regexp = '(.*)<(.*)>_(.*)';
                $word = null;
                if (preg_match_all("/$regexp/si", $morphWord, $matches)) {
                    $word = $matches[1][0];
                    if (array_key_exists($matches[2][0], LemmaTag::$lemmaTag)) {
                        $lemma = LemmaTag::$lemmaTag[$matches[2][0]];
                        $morphTag = $matches[3][0];
                        $morph = array();
                        if ($morphTag[0] != '-' && array_key_exists($morphTag[0], Morph::$morph[1])) {
                            $morph[0] = Morph::$morph[1][$morphTag[0]];
                        }
                        if ($morphTag[1] != '-' 
                            && array_key_exists($morphTag[0], Morph::$morph[2])
                            && array_key_exists($morphTag[1], Morph::$morph[2][$morphTag[0]])
                        ) {
                            $morph[1] = Morph::$morph[2][$morphTag[0]][$morphTag[1]];
                        }
                        if ($morphTag[2] != '-'
                            && array_key_exists($morphTag[0], Morph::$morph[3])
                            && array_key_exists($morphTag[2], Morph::$morph[3][$morphTag[0]])
                        ) {
                            $morph[2] = Morph::$morph[3][$morphTag[0]][$morphTag[2]];
                        }
    
                        $return[] = array(
                            'word' => $word,
                            'lemma' => $lemma,
                            'morph' => $morph,
                        );
                    }
                }
            }

            return $return;
        }catch(\Exception $e){
            return false;
        }
    }
}
