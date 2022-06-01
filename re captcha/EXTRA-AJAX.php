<!DOCTYPE html>
<html>
  <head>
    <title>Simple PHP Contact Form</title>
    <link rel="stylesheet" href="2-form.css"/>
    <!-- (A) GOOGLE RECAPTCHA API -->
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <!-- (B) AJAX SUBMISSION -->
    <script>
    function doajax () {
      // (B1) GET FORM DATA
      var data = new FormData(document.getElementById("cform"));
      // REQUIRED: APPEND CAPTCHA RESPONSE
      data.append("g-recaptcha-response", grecaptcha.getResponse());

      // (B2) AJAX FETCH
      fetch("3-process.php", { method: "POST", body: data })
      .then((res) => { return res.text(); })
      .then((txt) => {
        // DO SOMETHING AFTER FORM SUBMISSION
        console.log(res);
      });
      return false;
    }
    </script>
  </head>
  <body>
    <!-- (C) CONTACT FORM -->
    <form id="cform" method="post" onsubmit="return doajax();">
      <h1>Contact Us</h1>

      <label>Your Name</label>
      <input type="text" name="name" required/>

      <label>Email Address</label>
      <input type="email" name="email" required/>

      <label>Message</label>
      <textarea name="message" required></textarea>

      <!-- (D) CAPTCHA - CHANGE SITE KEY! -->
      <div class="g-recaptcha" data-sitekey="6LeIsDUgAAAAADW03vFazZFYsjlH9kmGyBdYwA0c"></div>

      <input type="submit" value="Submit"/>
    </form>
  </body>
</html>
