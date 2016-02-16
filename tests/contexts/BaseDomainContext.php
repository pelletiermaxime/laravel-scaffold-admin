<?php

use Behat\Behat\Context\SnippetAcceptingContext;

/**
 * Behat context class.
 */
class BaseDomainContext implements SnippetAcceptingContext
{
    /**
    * @static
    * @beforeSuite
    */
    public static function bootstrapLaravel()
    {
        // $app = require __DIR__.'/../../../../bootstrap/app.php';
        // $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
        // return $app;
    }
}
