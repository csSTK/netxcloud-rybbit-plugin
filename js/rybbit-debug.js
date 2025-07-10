// Debug-Version der JavaScript-Datei
console.log('Rybbit Tracking Plugin geladen');

fetch(OC.generateUrl('/ocs/v2.php/apps/rybbit_tracking/api/config'), {
  headers: {
    'OCS-APIREQUEST': 'true'
  }
})
.then(res => {
  console.log('API Response:', res);
  return res.json();
})
.then(data => {
  console.log('Config data:', data);
  if (!data.ocs || !data.ocs.data || !data.ocs.data.url) {
    console.warn('Keine gültige Konfiguration gefunden');
    return;
  }

  const cfg = data.ocs.data;
  console.log('Lade Rybbit Script:', cfg.url);
  
  var script = document.createElement('script');
  script.src = cfg.url;
  script.dataset.siteId = cfg.site_id;
  script.dataset.sessionReplay = cfg.replay;
  script.dataset.trackingErrors = cfg.errors;
  script.dataset.webVitals = cfg.vitals;
  script.defer = true;
  script.onload = () => console.log('Rybbit Script erfolgreich geladen');
  script.onerror = () => console.error('Fehler beim Laden des Rybbit Scripts');
  document.body.appendChild(script);
})
.catch(err => {
  console.error('Fehler beim Laden der Rybbit-Konfiguration:', err);
});
