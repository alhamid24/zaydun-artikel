/* ============================================================
   ZAYDUN — ANIMASI & TRANSISI GLOBAL (JS)
   ============================================================ */
(function () {
    "use strict";

    var REDUCED = window.matchMedia &&
        window.matchMedia("(prefers-reduced-motion: reduce)").matches;

    /* ---------- 1. PROGRESS BAR LOADING ---------- */
    function initProgress() {
        if (REDUCED) return;

        var bar = document.createElement("div");
        bar.id = "z-progress";
        document.body.appendChild(bar);

        var visible = false;
        var value = 0;
        var timer = null;

        function show() {
            visible = true;
            value = 8;
            bar.classList.add("z-progress-active");
            bar.style.width = value + "%";
            timer = setInterval(function () {
                if (!visible) return;
                var next = value + Math.random() * 8;
                value = Math.min(next, 90);
                bar.style.width = value + "%";
            }, 240);
        }

        function done() {
            if (!visible) return;
            visible = false;
            clearInterval(timer);
            bar.style.width = "100%";
            setTimeout(function () {
                bar.classList.remove("z-progress-active");
                bar.style.width = "0%";
            }, 300);
        }

        window.addEventListener("beforeunload", function () {
            if (document.visibilityState === "hidden") return;
            show();
        });

        window.addEventListener("pageshow", function (e) {
            if (e.persisted) done();
        });

        document.addEventListener("DOMContentLoaded", done);
        window.addEventListener("load", done);
    }

    /* ---------- 2. ENTRANCE HALAMAN ---------- */
    function initEntrance() {
        var main = document.querySelector("main");
        if (!main || REDUCED) return;
        main.classList.add("z-animate-in");
    }

    /* ---------- 3. SCROLL REVEAL ---------- */
    function initReveal() {
        var targets = document.querySelectorAll(".reveal");
        if (!targets.length) return;

        if (REDUCED || !("IntersectionObserver" in window)) {
            targets.forEach(function (el) { el.classList.add("revealed"); });
            return;
        }

        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add("revealed");
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: "0px 0px -8% 0px" });

        targets.forEach(function (el) { io.observe(el); });
    }

    /* ---------- 4. STARTER ---------- */
    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", function () {
            initEntrance();
            initReveal();
        });
    } else {
        initEntrance();
        initReveal();
    }

    initProgress();
})();
