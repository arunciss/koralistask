<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        $questions = array(
            'What programming languages can you work with?',
            'How do you approach high-pressure situations when everything goes wrong?',
            'What do you do first when creating something new?',
            'Which of the following statements about components in Angular are correct?',
            'Identify the invalid identifier?',
            'What is the best all-purpose way of comparing two strings?',
            'Trace the odd data type',
            'To work with remote files in PHP you need to enable',
            'Which of the following variables is not a predefined variable?',
            'Father of PHP?',
            'All variables in PHP start with which symbol?',
            'How would you add 1 to the variable $count?',
            'Assume that your php file \'index.php\' in location c:/apache/htdocs/phptutor/index.php. If you used $_SERVER[\'PHP_SELF\'] function in your page, then what is the return value of this function?',
            'Which of the following method sends input to a script via a URL? ',
            'Which of following are compound data type?',
            'Which of the following PCRE regular expressions best matches the string php|architect?'
        );

        $answers = array(
            0 => array(
                'PHP',
                'JAVA',
                'JavaScript',
                'C#'
            ),
            1 => array(
                'Nothing',
                'Looking for a problem',
                'Ignoring',
                'Panicked'
            ),
            2 => array(
                'Share in the social network',
                'Tell your friends',
                'Tell to first person who you meet',
                'Tell your parents'
            ),
            3 => array(
                'The properties of a component\'s children are available in the component\'s constructor.',
                'When a component depends on a service, the injector can be used to configure  dependency injection.',
                'A component defines its input parameters with the @Input decorator.',
                'A components ngOnDestroy method is called just before Angular destroys the component.'
            ),
            4 => array(
                'my-function',
                'size',
                '-some word',
                'This&that'
            ),
            5 => array(
                'Using the strpos function',
                'Using the == operator',
                'Using strcasecmp()',
                'Using strcmp()'
            ),
            6 => array(
                'floats',
                'integer',
                'doubles',
                'Real number'
            ),
            7 => array(
                'allow_url_fopen',
                'allow_remote_files',
                'both of above',
                'none of above'
            ),
            8 => array(
                '$request',
                '$ask',
                '$get',
                '$post'
            ),
            9 => array(
                'Larry Wall',
                'Rasmus Lerdorf',
                'James Gosling',
                'Guido Van Rossum'
            ),
            10 => array(
                '!',
                '$',
                '%',
                '&'
            ),
            11 => array(
                'incr count',
                '$count =+1',
                '$count++',
                'incr $count'
            ),
            12 => array(
                'phptutor/index.php',
                '/phptutor/index.php',
                'c:/apache/htdocs/phptutor/index.php',
                'index.php'
            ),
            13 => array(
                'Get',
                'Post',
                'Both',
                'None'
            ),
            14 => array(
                'Array',
                'Objects',
                'Both',
                'None'
            ),
            15 => array(
                '\d{3}\|\d{8}',
                '[a-z][a-z][a-z]\|\w{9}',
                '[az]{3}\|[az]{9}',
                '.*'
            )
        );

        for($i = 1; $i < 3; $i++){
            for($q = 1; $q < rand(10,count($questions)); $q++){
                $question = new App\question();

                $question->id_test = $i;
                $question->question = $questions[$q];

                $question->answer_01 = $answers[$q][0];
                $question->answer_02 = $answers[$q][1];
                $question->answer_03 = $answers[$q][2];
                $question->answer_04 = $answers[$q][3];

                $question->correct = rand(1,4);
                $question->point = rand(5,10);

                $question->save();
            }
        }
    }
}
