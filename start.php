<!DOCTYPE html>

<html>
  <head>
    <title><?=$title?></title>
    <style>
      html, body {
        margin: 0;
      }
      .main_content {
        padding: 4px;
      }
      .header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 60px;
        padding: 0 8px;
        background: lightgray;
      }
      .header__logo {
        width: 80px;
        height: 40px;
        font-size: 32px;
      }
      .header__user {
        font-size: 32px;
        button {
          margin-left: 12px;
          font-size: 32px;
        }
      }
    </style>
  </head>
  <body>