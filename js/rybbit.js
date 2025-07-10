console.log('Rybbit Tracking Plugin geladen');

fetch(OC.generateUrl('/ocs/v2.php/apps/rybbit_tracking/api/config'), {
  headers: {
    'OCS-APIREQUEST': 'true'
  }
})
.then(res => {
  console.log('API Response Status:', res.status);
  return res.json();
})
.then(data => {
  console.log('Config data:', data);
  
  // Die API gibt direktes Format zurück, nicht OCS-Format
  if (data.url && data.site_id) {
    console.log('✅ Konfiguration gefunden:', data);
    console.log('🚀 Lade Rybbit Script:', data.url, 'für Site:', data.site_id);
    
    var script = document.createElement('script');
    script.src = data.url;
    script.dataset.siteId = data.site_id;
    script.dataset.sessionReplay = data.replay ? 'true' : 'false';
    script.dataset.trackingErrors = data.errors ? 'true' : 'false';
    script.dataset.webVitals = data.vitals ? 'true' : 'false';
    script.defer = true;
    script.onload = () => console.log('✅ Rybbit Script erfolgreich geladen von:', data.url);
    script.onerror = () => console.error('❌ Fehler beim Laden des Rybbit Scripts von:', data.url);
    
    // Script in Head einfügen
    document.head.appendChild(script);
    console.log('📍 Script-Tag eingefügt:', script);
    
  } else {
    console.warn('⚠️ URL oder Site-ID fehlt in der Konfiguration:', data);
  }
})
.catch(err => {
  console.error('❌ Fehler beim Laden der Rybbit-Konfiguration:', err);
});
