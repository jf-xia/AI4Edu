<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class LoginCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    }

    /**
     * @Given I have my username
     */
    public function iHaveMyUsername()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I have my username` is not defined");
    }

    /**
     * @Given I have my password
     */
    public function iHaveMyPassword()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I have my password` is not defined");
    }

    /**
     * @When I click button to login process
     */
    public function iClickButtonToLoginProcess()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I click button to login process` is not defined");
    }

    /**
     * @Then I should see that success message
     */
    public function iShouldSeeThatSuccessMessage()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I should see that success message` is not defined");
    }

}
