jQuery(function($){

  var launch = new Date(2020,05,10,10,00,00); // Pour le mois : 0 = Janvier donc 10 = Novembre
  var days = $('#jours');
  var heures = $('#heures');
  var minutes = $('#minutes');
  var secondes = $('#secondes');

  function setDate(){
    var now = new Date(); // Date d'aujourd'hui
    console.log(now.toLocaleString()); // Affiche la date d'aujourd'hui dans la console

    var s = ((launch.getTime() - now.getTime())/1000) - now.getTimezoneOffset()*60 ; // Convertion Millisecondes en secondes
    var d = Math.floor(s/86400); // 1 journée = 24 heures de 60 minutes de 60 secondes
    // Math.floor retoure la valeure en dessous : 1.2 = 1
    // Math.ceil retourne la valeure supérieure
    days.html('<strong>'+d+'</strong> Jour'+(d>1?'s':''));
    s -= d*86400;

    var h = Math.floor(s/3600);
    heures.html('<strong>'+h+'</strong> Heure'+(h>1?'s':''));
    s -= h*3600;

    var m = Math.floor(s/60);
    minutes.html('<strong>'+m+'</strong> Minute'+(m>1?'s':''));
    s -= m*60;

    s = Math.floor(s);
    secondes.html('<strong>'+s+'</strong> Seconde'+(s>1?'s':''))

    setTimeout(setDate, 1000);
  }

  setDate();
});
