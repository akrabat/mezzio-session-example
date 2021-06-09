# Mezzio-Session example

A website with a set of pages showing the use of [Mezzio-Session](https://docs.mezzio.dev/mezzio-session/).

## Getting Started

1. Clone this project
2. `$ composer update`
3. `$ composer run --timeout=0 serve`

You can then browse to http://localhost:8080.

## Notes

* Clicking on "Login" simulates the login of user "Rob". You will be redirect to the home page.
* Clicking on "Page 1" will add a new variable to the session.
* Clicking on "Home" or "Page 2" just shows the current session ID and data
* Clicking on "Logout" clears the session and regenerates the session ID.
