# Missed-Call-Two-Factor-Authentication-PHP-Class-Reference
An Authentication factor which uses Missed/Dropped Call initiated from user's registered phone. Dropped/Missed Call is a call which gets disconnected by dedicated phone number before getting answered. You can Authenticate users using Dropped/Missed Call service.

Advantages of 2 Factor Authentication via Missed Call

    Passwordless Authentication.
    Low operational cost.
    Cheaper than OTP SMS Authentication.
    Cheaper than OTP Voice Authentication.
    Simple and secure HTTPS API based integration with your applications.

Most Commonly Used

    Sign up Verification.
    Leads Generation.
    Transaction Authorization.
    Member Account Verification.
    Cash on Delivery (COD) shipments.

Requirements

You need to avail dedicated missed call number.

Integrate our 2 Factor Authetication API.
API Work Flow

Our API handles all the authetication infrastructure. We have written a detailed documentation on 2 Factor Authentication via Missed Call which you can forward to your development team.

    Step 1: Hit our API with details such as callback and other parameters.
    Step 2: Upon Success response, flash the missed call number to be dialled to your user.
    Step 3: User dials the missed call number.
    Step 4: Operator sends us the call details.
    Step 5: We forward that detail to your callback URL.
    Step 6: Upon capturing the final response with Success, your user is authenticated.
    Step 7: Take your authenticated user for further transactions.

Note: Callback parameter is mandatory, the response will be forwarded to this URL whether customer dialled the missed call number or not.

More Information at https://www.smsgatewaycenter.com/site/2-factor-authentication-missed-call/
