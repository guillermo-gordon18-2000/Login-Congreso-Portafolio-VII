<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="container">
    <header>Signup Form</header>
    <div class="progress-bar">
      <div class="step">
        <p>
          Name
        </p>
        <div class="bullet">
          <span>1</span>
        </div>
        <div class="check fas fa-check"></div>
      </div>
      <div class="step">
        <p>
          Contact
        </p>
        <div class="bullet">
          <span>2</span>
        </div>
        <div class="check fas fa-check"></div>
      </div>
      <div class="step">
        <p>
          Birth
        </p>
        <div class="bullet">
          <span>3</span>
        </div>
        <div class="check fas fa-check"></div>
      </div>
      <div class="step">
        <p>
          Submit
        </p>
        <div class="bullet">
          <span>4</span>
        </div>
        <div class="check fas fa-check"></div>
      </div>
    </div>
    <div class="form-outer">
      <form action="#">
        <div class="page slide-page">
          <div class="title">
            Basic Info:
          </div>
          <div class="field">
            <div class="label">
              First Name
            </div>
            <input type="text">
          </div>
          <div class="field">
            <div class="label">
              Last Name
            </div>
            <input type="text">
          </div>
          <div class="field">
            <button class="firstNext next">Next</button>
          </div>
        </div>
        <div class="page">
          <div class="title">
            Contact Info:
          </div>
          <div class="field">
            <div class="label">
              Email Address
            </div>
            <input type="text">
          </div>
          <div class="field">
            <div class="label">
              Phone Number
            </div>
            <input type="Number">
          </div>
          <div class="field btns">
            <button class="prev-1 prev">Previous</button>
            <button class="next-1 next">Next</button>
          </div>
        </div>
        <div class="page">
          <div class="title">
            Date of Birth:
          </div>
          <div class="field">
            <div class="label">
              Date
            </div>
            <input type="text">
          </div>
          <div class="field">
            <div class="label">
              Gender
            </div>
            <select>
              <option>Hombre</option>
              <option>Mujer</option>
              
            </select>
          </div>
          <div class="field btns">
            <button class="prev-2 prev">Previous</button>
            <button class="next-2 next">Next</button>
          </div>
        </div>
        <div class="page">
          <div class="title">
            Login Details:
          </div>
          <div class="field">
            <div class="label">
              Username
            </div>
            <input type="text">
          </div>
          <div class="field">
            <div class="label">
              Password
            </div>
            <input type="password">
          </div>
          <div class="field btns">
            <button class="prev-3 prev">Previous</button>
            <button class="submit">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div> <!---->





</body>

</html>