<?php

use Core\Validator;

it ('validates an email', function () {
   expect(Validator::email('this_is_not_email'))->toBeFalse();
   expect(Validator::email('this_is_email@email.com'))->toBeTrue();
   expect(Validator::email(''))->toBeFalse();
   expect(Validator::email(0))->toBeFalse();
});

it ('validates a string', function () {
   expect(Validator::string(''))->toBeFalse();
   expect(Validator::string('This is string'))->toBeTrue();
   expect(Validator::string('This is string', 100, 200))->toBeFalse();
   expect(Validator::string(false))->toBeFalse();
});