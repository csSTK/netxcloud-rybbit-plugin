fetch(OC.generateUrl('/ocs/v2.php/apps/rybbit_tracking/api/config'), {
  headers: {
    'OCS-APIREQUEST': 'true'
  }
})
.then(res => res.json())
.then(data => {
  if (!data.ocs || !data.ocs.data || !data.ocs.data.url) return;

  const cfg = data.ocs.data;
  var script = document.createElement('script');
  script.src = cfg.url;
  script.dataset.siteId = cfg.site_id;
  script.dataset.sessionReplay = cfg.replay;
  script.dataset.trackingErrors = cfg.errors;
  script.dataset.webVitals = cfg.vitals;
  script.defer = true;
  document.body.appendChild(script);
});
