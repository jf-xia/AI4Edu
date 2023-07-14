Feature: Login
    In order to access this system
    As a student
    I need to be able to Login

    Scenario: try Login
        Given I have my username
        And I have my password
        When I click button to login process
        Then I should see that success message
