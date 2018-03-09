<?php

namespace Vortexgin\MorphAnalyzerBundle\Model;

final class Morph
{

    public static $morph = [
        1 => [
            'N' => 'Noun',
            'P' => 'Personal Pronoun',
            'V' => 'Verb',
            'C' => 'Numeral',
            'Q' => 'Adjective',
            'A' => 'Adjective',
            'H' => 'Coordinating Conjunction',
            'S' => 'Subordinating Conjunction',
            'F' => 'Foreign Word',
            'R' => 'Preposition',
            'M' => 'Modal',
            'B' => 'Determiner',
            'D' => 'Adverb',
            'T' => 'Particle',
            'G' => 'Negation',
            'I' => 'Interjection',
            'O' => 'Copula',
            'W' => 'Question',
            'X' => 'Unknown',
            'Z' => 'Punctuation',
        ],
        2 => [
            'N' => [
                'P' => 'Plural',
                'S' => 'Singular',
            ],
            'P' => [
                'P' => 'Plural',
                'S' => 'Singular',
            ],
            'V' => [
                'P' => 'Plural',
                'S' => 'Singular',
            ],
            'C' => [
                'C' => 'Cardinal Numeral',
                'O' => 'Ordinal Numeral',
                'D' => 'Collective Numeral',
            ],
            'A' => [
                'P' => 'Plural',
                'S' => 'Singular',
            ],
        ],
        3 => [
            'N' => [
                'F' => 'Feminine',
                'M' => 'Masculine',
                'D' => 'Non-Specified',
            ],
            'P' => [
                '1' => 'First Person',
                '2' => 'Second Person',
                '3' => 'Third Person',
            ],
            'V' => [
                'A' => 'Active Voice',
                'P' => 'Passive Voice',
            ],
            'A' => [
                'P' => 'Positive',
                'S' => 'Superllative',
            ],
        ],
    ];
}