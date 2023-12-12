var doCache = true;
var CACHE_NAME = 'my-pwa-cache-v2';

self.addEventListener('activate', event => {
   const cacheWhitelist = [CACHE_NAME];
   event.waitUntil(
       caches.keys()
           .then(keyList =>
               Promise.all(keyList.map(key => {
                   if (!cacheWhitelist.includes(key)) {
                       return caches.delete(key);
                   }
               }))
           )
   );
});

self.addEventListener('install', function(event) {
   if (doCache) {
       event.waitUntil(
           caches.open(CACHE_NAME)
               .then(function(cache) {
                   fetch('data/manifest.json')
                       .then(response => {
                           response.json()
                       })
                       .then(assets => {
                           const urlsToCache = [
                               '/app/',
                               '/static/core/logo.svg*',
                           ]
                           cache.addAll(urlsToCache)
                       })
               })
       );
   }
});

self.addEventListener('fetch', function(event) {
   if (doCache) {
       event.respondWith(
           caches.match(event.request).then(function(response) {
               return response || fetch(event.request);
           })
       );
   }
});