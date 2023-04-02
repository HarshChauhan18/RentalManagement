<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Button</title>
    <style>
            <title>button</title>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: sans-serif;
        background: #000;
      }
      button {
        border: none;
        padding: 20px 40px;
        font-size: 44px;
        position: relative;
        background: transparent;
        color: #ffa500;
        text-transform: uppercase;
        border: 3px solid #ffa500;
        cursor: pointer;
        transition: all 0.7s;
        overflow: hidden;
        border-radius: 100px;
      }
      button:hover {
        color: #000;
      }
      span {
        transition: all 0.7s;
        z-index: -1;
      }
      button .first {
        content: "";
        position: absolute;
        right: 100%;
        top: 0;
        width: 25%;
        height: 100%;
        background: #ffa500;
      }
      button:hover .first {
        top: 0;
        right: 0;
      }
      button .second {
        content: "";
        position: absolute;
        left: 25%;
        top: -100%;
        height: 100%;
        width: 25%;
        background: #ffa500;
      }
      button:hover .second {
        top: 0;
        left: 50%;
      }
      button .third {
        content: "";
        position: absolute;
        left: 50%;
        height: 100%;
        top: 100%;
        width: 25%;
        background: #ffa500;
      }
      button:hover .third {
        top: 0;
        left: 25%;
      }
      button .fourth {
        content: "";
        position: absolute;
        left: 100%;
        top: 0;
        height: 100%;
        width: 25%;
        background: #ffa500;
      }

      button:hover .fourth {
        top: 0;
        left: 0;
      }

    </style>
</head>
<body>
    <button>
      hover me
      <span class="first"></span>
      <span class="second"></span>
      <span class="third"></span>
      <span class="fourth"></span>
    </button>
  </body>
</html>