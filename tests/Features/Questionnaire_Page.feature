Feature: Completing a questionnaire

  This feature allows visitors to access a live questionnaire,
  view the questions, select answers, and submit their responses.

  Scenario: Viewing and answering a questionnaire
    Given the questionnaire website is live and accessible
    And at least one questionnaire is in "live" mode
    And the questionnaire has at least 5 questions with multiple choice answers
    When the user navigates to the questionnaire page
    Then the user should see the questionnaire title and description
    And the user should see all questions with multiple choice options

  Scenario: Submitting a questionnaire
    Given the user has filled in answers for all questions
    When the user clicks the "Submit" button
    Then the user should see a confirmation message stating "Thank you for completing the questionnaire"

  Scenario: No questionnaire available
    Given no questionnaire is currently in "live" mode
    When the user navigates to the questionnaire page
    Then the user should see a message stating "No questionnaires are currently available"