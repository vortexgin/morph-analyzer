<?php

namespace Vortexgin\MorphAnalyzerBundle\Model;

final class LemmaTag
{

    public static $lemmaTag = [
        'n' => 'Noun', //kata benda
        'p' => 'Personal Pronoun',
        'v' => 'Verb', //kata kerja
        'c' => 'Numeral', //kata bilangan
        'q' => 'Adjective', //kata sifat
        'a' => 'Adjective', //kata sifat
        'h' => 'Coordinating Conjunction', //kata hubung yang menghubungkan dua klausa yang setara (dan, jadi)
        's' => 'Subordinating Conjunction',
        'f' => 'Foreign Word',
        'r' => 'Preposition',
        'm' => 'Modal',
        'b' => 'Determiner',
        'd' => 'Adverb', //kata keterangan
        't' => 'Particle', //imbuhan
        'g' => 'Negation',
        'i' => 'Interjection',
        'o' => 'Copula',
        'w' => 'Question',
        'x' => 'Unknown',
        'z' => 'Punctuation',
    ];
}