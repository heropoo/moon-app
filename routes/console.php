<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/7/14
 * Time: 0:20
 */

Moon::command('hello', 'HelloCommand::run', 'Hello Moon');
Moon::command('fmc', 'FillModelCommentCommand::run', 'Fill Model Comment');