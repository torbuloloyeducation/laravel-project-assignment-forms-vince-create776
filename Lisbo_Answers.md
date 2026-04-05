# Activity 2: Forms in Laravel - Reflection Answers

## Task 1: Understanding the Flow

When a user enters an email and clicks Save, the form sends a POST request to the `/form` route. The POST route receives the email using `request('email')` and stores it in the session using `session()->push()`. After saving, it redirects back to the GET `/form` route which retrieves all emails from the session and passes them to the view. The view then loops through the emails using `@foreach` and displays them in a list. If the session is cleared, all emails will be lost since they are not saved in a database.

## Reflection Questions

### 1. What is the difference between GET and POST?

GET is used to retrieve and display data, and the data is visible in the URL. POST is used to submit and send data to the server, and the data is hidden in the request body. GET is used for reading data while POST is used for saving or submitting data.

### 2. Why do we use `@csrf` in forms?

We use `@csrf` to protect our forms from Cross-Site Request Forgery attacks. Laravel automatically generates a token and checks it when a form is submitted. If the token is missing or invalid, Laravel will reject the request and return a 419 error.

### 3. What is session used for in this activity?

Session is used to temporarily store the list of emails across multiple requests. Since HTTP is stateless, session allows us to remember the emails the user has submitted even after the page reloads or redirects.

### 4. What happens if session is cleared?

If the session is cleared, all the stored emails will be lost and the list will become empty. This is because the emails are only stored in the session and not saved permanently in a database.