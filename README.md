# Docs From Endpoint:

## Description
This endpoint allows you to validate reCAPTCHA v2/v3 tokens from the server side, acting as a secure intermediary between your frontend application and Google's servers.

## URL examples
https://your-domain.com/verify-recaptcha.php
YOUR_SERVER/verify-recaptcha.php

## General Information
- URL: https://your-domain.com
- HTTP Method: POST
- Input Format: JSON
- Output Format: JSON

## Endpoint Details
- **URL:** `YOUR_SERVER/verify-recaptcha.php`
- **Method:** `POST`
- **Content-Type:** `application/json`
- **CORS:** (`Access-Control-Allow-Origin: *`)

## Steps to configure
- The user must register their domain on https://www.google.com/recaptcha/admin and obtain both the secret key and the public key.
- The server must have configured the RECAPTCHA_SECRET_KEY environment variable with the secret key provided by Google to be passed to the endpoint file verify-recaptcha.php.
- The frontend must have included the reCAPTCHA JavaScript API in their HTML, provided by Google.
- The frontend must have configured the public key provided by Google in the data-sitekey attribute of the reCAPTCHA element.
- The frontend has to pass the token to the endpoint file verify-recaptcha.php.

## Petition Structure
Body from the JSON request:
| Field   | Type     | Description                                   |
| :------- | :------- | :-------------------------------------------- |
| `token` | `string` | the reCAPTCHA token to be validated           |
