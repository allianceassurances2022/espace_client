<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>attestation</title>
  <meta name="generator" content="Google Web Designer 9.0.2.0915">
  <style type="text/css" id="gwd-text-style">
    p {
      margin: 0px;
    }
    h1 {
      margin: 0px;
    }
    h2 {
      margin: 0px;
    }
    h3 {
      margin: 0px;
    }
  </style>
  <style type="text/css">
    html, body {
      width: 100%;
      height: 100%;
      margin: 0px;
    }
    body {
      background-color: transparent;
      transform: perspective(1400px) matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
      transform-style: preserve-3d;
    }
    .gwd-img-4igk {
      position: absolute;
      width: 335px;
      height: 575px;
      left: 0px;
      top: 0px;
    }
    .gwd-p-fm2v {
      height: 29px;
      position: absolute;
      top: 220px;
      width: 172px;
      transform-origin: 50% 50% 0px;
      left: 46px;
    }
    .gwd-p-fh47 {
      height: 16px;
      left: 30px;
      position: absolute;
      width: 214px;
      transform-origin: 50% 50% 0px;
      top: 294px;
    }
    .gwd-p-5978 {
      height: 17px;
      left: 184px;
      position: absolute;
      width: 77px;
      transform-origin: 50% 50% 0px;
      top: 319px;
    }
    .gwd-p-1sa9 {
      height: 18px;
      left: 11px;
      position: absolute;
      width: 79px;
      top: 318px;
    }
    .gwd-p-ayvg {
      top: 254px;
      height: 19px;
      left: 15px;
      width: 305px;
    }
    .gwd-p-1v7b {
      position: absolute;
      width: 85px;
      height: 20px;
      left: 234px;
      top: 379px;
      text-align: center;
      transform-origin: 42.5px 10px 0px;
      font-size: 14px;
    }
    .gwd-p-z1rd {
      position: absolute;
      width: 99px;
      left: 115px;
      transform-origin: 50% 50% 0px;
      height: 19px;
      top: 380px;
      text-align: center;
      font-size: 14px;
    }
    .gwd-p-1opd {
      position: absolute;
      width: 91px;
      left: 9px;
      transform-origin: 50% 50% 0px;
      height: 19px;
      top: 380px;
      text-align: center;
      font-size: 12px;
    }
    .gwd-p-jwqr {
      width: 222px;
    }
    .gwd-p-1l6l {
      position: absolute;
      height: 20px;
      transform-origin: 50% 50% 0px;
      left: 9px;
      top: 98px;
      width: 123px;
    }
    .gwd-p-u5pu {
      position: absolute;
      height: 19px;
      transform-origin: 50% 50% 0px;
      width: 29px;
      left: 40px;
      top: 50px;
    }
  </style>
</head>

<body class="htmlNoPages">
  <img src="{{ public_path('assets/img/Attestation.png') }}" id="Attestation" class="gwd-img-4igk">
  <p class="gwd-p-fm2v gwd-p-jwqr">{{$user->name}} {{$user->prenom}}</p>
  <p class="gwd-p-fm2v gwd-p-ayvg">{{$user->adresse}}</p>
  <p class="gwd-p-fh47">{{$devis->reference_police}}</p>
  <p class="gwd-p-5978">{{$devis->date_expiration}}</p>
  <p class="gwd-p-1sa9">{{$devis->date_effet}}</p>
  <p class="gwd-p-1v7b">{{$risque->marque}}</p>
  <p class="gwd-p-z1rd">{{$risque->modele}}</p>
  <p class="gwd-p-1opd">{{$risque->matricule}}</p>
  <p class="gwd-p-1l6l">Agence {{$devis->code_agence}}</p>
  <p class="gwd-p-u5pu">DG</p>
</body>

</html>
