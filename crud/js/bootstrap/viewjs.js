function deletere(str) {
    if (str.length == 0) {
      document.getElementById("txtHint").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          if(this.responseText==1)
          { 
              document.getElementById("txtHint").innerHTML = "Record deleted successfully";
              setInterval('window.location.reload()', 4000);
          }
          else
          {
              document.getElementById("txtHint").innerHTML = this.responseText;
          }
  
        }
      };
      xmlhttp.open("GET", "delete.php?id=" + id, true);
      xmlhttp.send();
    }
  }

  (function(w, d) {
    ! function(a, e, t, r) {
        a.zarazData = a.zarazData || {}, a.zarazData.executed = [], a.zarazData.tracks = [], a.zaraz = {
            deferred: []
        }, a.zaraz.track = (e, t) => {
            for (key in a.zarazData.tracks.push(e), t) a.zarazData["z_" + key] = t[key]
        }, a.zaraz._preSet = [], a.zaraz.set = (e, t, r) => {
            a.zarazData["z_" + e] = t, a.zaraz._preSet.push([e, t, r])
        }, a.addEventListener("DOMContentLoaded", (() => {
            var t = e.getElementsByTagName(r)[0],
                z = e.createElement(r),
                n = e.getElementsByTagName("title")[0];
            n && (a.zarazData.t = e.getElementsByTagName("title")[0].text), a.zarazData.w = a.screen.width, a.zarazData.h = a.screen.height, a.zarazData.j = a.innerHeight, a.zarazData.e = a.innerWidth, a.zarazData.l = a.location.href, a.zarazData.r = e.referrer, a.zarazData.k = a.screen.colorDepth, a.zarazData.n = e.characterSet, a.zarazData.o = (new Date).getTimezoneOffset(), z.defer = !0, z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a.zarazData))), t.parentNode.insertBefore(z, t)
        }))
    }(w, d, 0, "script");
})(window, document);