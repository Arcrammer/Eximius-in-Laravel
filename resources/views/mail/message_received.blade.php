<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body style="
    background-color: black;
    margin: 50px auto 25px;
    width: 600px
  ">
    <h4 style="
      color: white;
      font-family: 'Helvetica Neue', 'Helvetica', sans-serif;
      font-size: 1.15em;
      font-weight: 200;
      letter-spacing: 1px;
      text-align: center;
    ">{{ $sender }} has sent a message to you through Eximius!</h4>
    <div style="
      background-color: rgba(255, 255, 255, 0.15);
      margin: auto;
      padding: 35px 75px;
      width: 400px
    ">
      <h6 style="
        color: white;
        font-family: 'Helvetica Neue', 'Helvetica', sans-serif;
        font-size: 1em;
        font-weight: 400;
        letter-spacing: 1.15px;
        margin: 0;
        text-align: center;
        text-transform: uppercase
      ">{{ $subject }}</h6>
      <p style="
        color: white;
        font-family: 'Helvetica Neue', 'Helvetica', sans-serif;
        font-size: 1em;
        font-weight: 200;
        line-height: 150%;
        text-align: center
      ">"{{ $preview }}"</p>
      <button style="
        background-color: transparent;
        color: white;
        cursor: pointer;
        text-transform: uppercase;
        border: 2px solid #d4af37;
        font-family: 'Bebas Neue', 'Helvetica Neue', 'Helvetica', sans-serif;
        font-size: 1em;
        margin: 35px auto;
        margin-left: 37.5%;
        padding: 15px 20px;
        letter-spacing: 1.15px;
        width: 25%
      ">
        <a href="/messages" style="
          color: white;
          text-decoration: none;
        ">Read It</a>
      </button>
    </div>
  </body>
</html>
