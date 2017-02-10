<?php
require 'new_developers.php';
/*
 * @package Postmen
 * @author Postmen digital Agency LLC.
 * @since 2013
 * @email office@postmen.com.ua
 * @todo hire new developers
 * @see http://postmen.com.ua
 * @version 1.0.0
 */
namespace Ukraine\Kiev;
class Employer implements \eCommerce, \Consulting, \Development, \UX, \Support
{
    public static $LANG = array('uk_UK', 'en_US', 'ru_RU');
    private $fun = array();
    private $team = array();
    private $email = 'office@postmen.com.ua';

    public function has($k)
    {
        $this->fun[$k] = true;
        return $this;
    }

    public function need(AwesomeDeveloper $Developer)
    {
        return $Developer::$skills;
    }

    public function hire(AwesomeDeveloper $Developer)
    {
        $this->team[] = $Developer;
        return true;
    }

    public function fun()
    {
        return $this->fun;
    }

    public function email()
    {
        return $this->email;
    }
}

class PhpDeveloper extends AwesomeDeveloper
{
    const SKILL_LEVEL = 6;
    public static $skills = array(
        'PHP', 'Laravel', 'JS', 'MySQL', 'MVC', 'OOP', 'REST'
    );
    public static $requirements = array(
        '2+YearsOfExperience', 'HobbyProjects', 'Git', 'Composer', 'References', 'TeamPlayer',
        'Accuracy', 'InterestInNewTechnologies'
    );

    public function apply(Employer $Employer)
    {
        return mail($Employer->email(), 'Junior PHP Developer', $this);
    }
}

abstract class AwesomeDeveloper implements \Cool
{
    const SKILL_LEVEL = 0;
    public static $skills = array();
    public static $requirements = array();
    public static $preferred = array(
        'References', 'Frameworks', 'Linux',
        'DistributedSystems', 'HighTrafficSystems', 'Agile'
    );
    protected $funLevel = 0;
    protected $mySkills = array();

    public static function born()
    {
        return new PhpDeveloper();
    }

    public function learn()
    {
        $skills = array_merge(static::$skills, self::$preferred);
        $this->mySkills = array_slice($skills, 0, rand(1, count($skills)));
    }

    public function has($verySkills)
    {
        return count(array_intersect($this->mySkills, $verySkills)) >
        static::SKILL_LEVEL;
    }

    public function get(array $muchFun)
    {
        $this->funLevel += count($muchFun);
    }

    public function fullTime()
    {
        return $this->__sleep(@$night) && $this->__wakeup($early);
    }

    abstract public function apply(Employer $Employer);
}

$Postmen = new Employer();
$Postmen
    ->has('goodSalary')
    ->has('trainingCourses')
    ->has('yoga')
    ->has('manyParties')
    ->has('birthdayCake')
    ->has('niceView')
    ->has('hotCoffee')
    ->has('wakeUps')
    ->has('lovelyBoss')
    ->has('postmen');

$You = AwesomeDeveloper::born();
$You->learn();

if ($You->has($Postmen->need($You)) && $You->fullTime()
    && $You instanceof \Cool && $You->apply($Postmen) && $Postmen->hire($You)
) {
    $You->get($Postmen->fun());
}
