<?php
/**
 * HSR Verify Email
 *
 * @package    HSR Verify Email
 * @author     Rishabh Jain <jrishabh55@gmail.com>
 * @copyright  Copyright (c) HSRTECH 2016
 * @license    ------- Yet To Decide -------
 * @version    1.0
 * @link       http://www.hsrtech.com/
 */

 if (!defined("WHMCS")) die("This file cannot be accessed directly");

require_once __DIR__.'/includes.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$setting = Capsule::table('tbladdonmodules')
                ->where('module','=','hsrverifyemail')
                ->where('setting','=','activate')
                ->first();

if($setting->value == 'yes')
{

    use HSR\Hooks;
    Hooks::init()->addHooks([
        'ClientAdd',
        'ClientLogin',
    ]);
} 
