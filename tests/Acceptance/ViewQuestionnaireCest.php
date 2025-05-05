<?php

declare(strict_types=1);


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

final class ViewQuestionnaireCest
{
    public function _before(AcceptanceTester $I): void
    {
        // Code here will be executed before each test.
    }

    public function seeNoQuestionnaireMessage(AcceptanceTester $I)
    {
        // The questionnaire page should display a message to the user if there are no questionnaires live
        $I->amOnPage('/questionnaires');

        $I->see('No questionnaires are currently available');
    }

    public function seeQuestionnaireAvailable(AcceptanceTester $I)
    {

        $I->amOnPage('/questionnaires');

        // The user should expect to see the title and description of the questionnaire
        $I->see('Best Animal Questionnaire');
        $I->see('This is a questionnaire to see what animals people like the most.');

        // The user should expect to see at least one question (should be five in final implementation, just one for testing purposes)
        $I->see('What is your favourite animal? There is only one correct answer');

        // The user should expect to see at least one answer (should be more in final implementation, as above)
        $I->see('Rabbit');
    }
}