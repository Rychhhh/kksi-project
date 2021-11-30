(function (a, s, y, n, c, h, i, d, e) {
    s.className += " " + y;
    h.start = 1 * new Date();
    h.end = i = function () {
        s.className = s.className.replace(RegExp(" ?" + y), "");
    };
    (a[n] = a[n] || []).hide = h;
    setTimeout(function () {
        i();
        h.end = null;
    }, c);
    h.timeout = c;
})(window, document.documentElement, "async-hide", "dataLayer", 4000, {
    "GTM-K9BGS8K": true,
});

(function (i, s, o, g, r, a, m) {
    i["GoogleAnalyticsObject"] = r;
    (i[r] =
        i[r] ||
        function () {
            (i[r].q = i[r].q || []).push(arguments);
        }),
        (i[r].l = 1 * new Date());
    (a = s.createElement(o)), (m = s.getElementsByTagName(o)[0]);
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m);
})(
    window,
    document,
    "script",
    "https://www.google-analytics.com/analytics.js",
    "ga"
);
ga("create", "UA-46172202-22", "auto", {
    allowLinker: true,
});
ga("set", "anonymizeIp", true);
ga("require", "GTM-K9BGS8K");
ga("require", "displayfeatures");
ga("require", "linker");
ga("linker:autoLink", ["2checkout.com", "avangate.com"]);

(function (w, d, s, l, i) {
    w[l] = w[l] || [];
    w[l].push({
        "gtm.start": new Date().getTime(),
        event: "gtm.js",
    });
    var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != "dataLayer" ? "&l=" + l : "";
    j.async = true;
    j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
    f.parentNode.insertBefore(j, f);
})(window, document, "script", "dataLayer", "GTM-NKDMSK6");

var ctx = document.getElementById("chart-bars").getContext("2d");

new Chart(ctx, {
    type: "bar",
    data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [
            {
                label: "Sales",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                backgroundColor: "#fff",
                data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
                maxBarThickness: 6,
            },
        ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            display: false,
        },
        tooltips: {
            enabled: true,
            mode: "index",
            intersect: false,
        },
        scales: {
            yAxes: [
                {
                    gridLines: {
                        display: false,
                    },
                    ticks: {
                        suggestedMin: 0,
                        suggestedMax: 500,
                        beginAtZero: true,
                        padding: 0,
                        fontSize: 14,
                        lineHeight: 3,
                        fontColor: "#fff",
                        fontStyle: "normal",
                        fontFamily: "Open Sans",
                    },
                },
            ],
            xAxes: [
                {
                    gridLines: {
                        display: false,
                    },
                    ticks: {
                        display: false,
                        padding: 20,
                    },
                },
            ],
        },
    },
});

var ctx2 = document.getElementById("chart-line").getContext("2d");

var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

gradientStroke1.addColorStop(1, "rgba(203,12,159,0.2)");
gradientStroke1.addColorStop(0.2, "rgba(72,72,176,0.0)");
gradientStroke1.addColorStop(0, "rgba(203,12,159,0)"); //purple colors

var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

gradientStroke2.addColorStop(1, "rgba(20,23,39,0.2)");
gradientStroke2.addColorStop(0.2, "rgba(72,72,176,0.0)");
gradientStroke2.addColorStop(0, "rgba(20,23,39,0)"); //purple colors

new Chart(ctx2, {
    type: "line",
    data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [
            {
                label: "Mobile apps",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#cb0c9f",
                borderWidth: 3,
                backgroundColor: gradientStroke1,
                data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                maxBarThickness: 6,
            },
            {
                label: "Websites",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#3A416F",
                borderWidth: 3,
                backgroundColor: gradientStroke2,
                data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                maxBarThickness: 6,
            },
        ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            display: false,
        },
        tooltips: {
            enabled: true,
            mode: "index",
            intersect: false,
        },
        scales: {
            yAxes: [
                {
                    gridLines: {
                        borderDash: [2],
                        borderDashOffset: [2],
                        color: "#dee2e6",
                        zeroLineColor: "#dee2e6",
                        zeroLineWidth: 1,
                        zeroLineBorderDash: [2],
                        drawBorder: false,
                    },
                    ticks: {
                        suggestedMin: 0,
                        suggestedMax: 500,
                        beginAtZero: true,
                        padding: 10,
                        fontSize: 11,
                        fontColor: "#adb5bd",
                        lineHeight: 3,
                        fontStyle: "normal",
                        fontFamily: "Open Sans",
                    },
                },
            ],
            xAxes: [
                {
                    gridLines: {
                        zeroLineColor: "rgba(0,0,0,0)",
                        display: false,
                    },
                    ticks: {
                        padding: 10,
                        fontSize: 11,
                        fontColor: "#adb5bd",
                        lineHeight: 3,
                        fontStyle: "normal",
                        fontFamily: "Open Sans",
                    },
                },
            ],
        },
    },
});

var win = navigator.platform.indexOf("Win") > -1;
if (win && document.querySelector("#sidenav-scrollbar")) {
    var options = {
        damping: "0.5",
    };
    Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
}
