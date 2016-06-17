/**
 * Secret Entry
 * https://github.com/snaptortoise/konami-js
 */

var DSE = function (callback) {
  var dse = {
    addEvent: function (obj, type, fn, ref_obj) {
      if (obj.addEventListener) {
        obj.addEventListener(type, fn, false);
      } else if (obj.attachEvent) {
        obj["e" + type + fn] = fn;
        obj[type + fn] = function () {
          obj["e" + type + fn](window.event, ref_obj);
        };
        obj.attachEvent("on" + type, obj[type + fn]);
      }
    },
    input: "",
    pattern: "77658267738583",
    load: function (link) {
      this.addEvent(document, "keydown", function (e, ref_obj) {
        if (ref_obj) {
          dse = ref_obj;
        }
        dse.input += e ? e.keyCode : event.keyCode;
        if (dse.input.length > dse.pattern.length) {
          dse.input = dse.input.substr((dse.input.length - dse.pattern.length));
        }
        if (dse.input == dse.pattern) {
          dse.code(link);
          dse.input = "";
          e.preventDefault();
          return false;
        }
      }, this);
    },
    code: function (link) {
      window.location = link;
    }
  };
  typeof callback === "string" && dse.load(callback);
   if (typeof callback === "function") {
    dse.code = callback;
    dse.load();
  }
  return dse;
};

function getXmlHttpRequestObject() {
  if (window.XMLHttpRequest) {
    return new XMLHttpRequest();
  } else if (window.ActiveXObject) {
    return new ActiveXObject("Microsoft.XMLHTTP");
  } else {
    alert("Nem támogatott böngésző!");
  }
}

var lampaReq = getXmlHttpRequestObject();

function lampa_info() {
  if (lampaReq.readyState == 4 || lampaReq.readyState == 0) {
    var str = escape(document.getElementById('lampad').value);
    lampaReq.open("GET", 'scripts/lampaf.php?lampad=' + str, true);
    lampaReq.onreadystatechange = handlelampa_info;
    lampaReq.send(null);
  }
}

function handlelampa_info() {
  if (lampaReq.readyState == 4 && lampaReq.status == 200) {
    document.getElementById('lampad').value = lampaReq.responseText;
  }
}

var easter_egg = new DSE(function() {
  document.getElementById('lampa').className = "lampa zold";
  document.getElementById('lampad').value = "1";
  lampa_info();
});
