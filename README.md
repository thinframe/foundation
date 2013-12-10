#ThinFrame Foundation

Is a collection of classes that make the foundation of all ThinFrame components.

[![Build Status](https://secure.travis-ci.org/thinframe/foundation.png?branch=master)](http://travis-ci.org/thinframe/foundation)

##Index
1. [TypeCheck](#typecheck)
2. [AbstractEnum](#abstractenum)


## TypeCheck
TypeHinting for primary types

Sample usage:

    <?php
    use ThinFrame\Foundation\Constants\DataType;
    use ThinFrame\Foundation\Helpers\TypeCheck;
    
    function myAwesomeFunction($stringVariable, \Exception $exception, $boolVariable)
    {
        //if any of the above arguments doesn't respect the type an invalid argument exception will be thrown
        TypeCheck::doCheck(DataType::STRING, DataType::SKIP, DataType::BOOLEAN);
    }

If any of the function arguments doesn't match the given type, and `InvalidArgumentException` will be thrown. Argument types are specified in order of the declaration (check `ThinFrame\Foundation\Constants\DataType` for possible data types. `DataType::SKIP` is used to skip the validation of a argument. 

## AbstractEnum
Enum implementation for PHP. An enumeration is defined using constants and it also can be instantiated. 

    <?php
    use ThinFrame\Foundation\DataTypes\AbstractEnum;
    
    class WeekDay extends AbstractEnum
    {
        const MONDAY    = 1;
        const TUESDAY   = 2;
        const WEDNESDAY = 3;
        const THURSDAY  = 4;
        const FRIDAY    = 5;
        const SATURDAY  = 6;
        const SUNDAY    = 7;
    }
    
    //constructor will accept only valid enum values
    $weekDay = new WeekDay(WeekDay::SUNDAY);
    
    $weekDay->equals(WeekDay::SUNDAY); // true
    $weekDay->equals(WeekDay::MONDAY); // false (captain obvious)
    
    WeekDay::getMap(); //Map with enum key=>value pairs
    
    WeekDay::isValid(5); //true
    WeekDay::isValid(9); //false
    
    WeekDay::type(); //callback that will validate a given enum value. Used for TypeCheck


###Installation:
* via Composer: `"thinframe/foundation":"dev-master"`

###Copyright
* MIT License - Sorin Badea <sorin.badea91@gmail.com>
