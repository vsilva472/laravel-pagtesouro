function PagTesouroIframe () {
    this.sandbox = false;

    this.setCss();
    this.setJavascript();
}

PagTesouroIframe.prototype.inSandbox = function () {
    this.sandbox = true;
    return this;
};

PagTesouroIframe.prototype.setCss = function () {
    var head = document.querySelector('head');
    var style = document.createElement('style');
    style.innerText = '.iframe-epag { margin: 0; padding: 0; border: 0; width: 1px; min-width: 100%;}';
    head.appendChild(style);

    return this;
};

PagTesouroIframe.prototype.setJavascript = function () {
    var head    = document.querySelector('head');
    var script  = document.createElement('script');
    script.src  = 'https://cdnjs.cloudflare.com/ajax/libs/iframe-resizer/3.6.6/iframeResizer.min.js';
    head.appendChild(script);
};

PagTesouroIframe.prototype.render = function (element, callback) {
    var iframe = document.createElement('iframe');

    iframe.setAttribute('class', 'iframe-epag');
    iframe.setAttribute('scrolling', 'no');
    iframe.setAttribute('src', element.getAttribute('data-payment-url'));
    
    element.appendChild(iframe);

    iframe.onload = function () {
        iFrameResize({ heightCalculationMethod: "documentElementOffset" }, ".iframe-epag");
    };

    if (callback) this.handleEvent(callback);
};

PagTesouroIframe.prototype.handleEvent = function (callback) {
    if (!callback) return;

    let origin = this.sandbox 
        ? 'https://valpagtesouro.tesouro.gov.br' 
        : 'https://pagtesouro.tesouro.gov.br';

    window.addEventListener("message", function (event) { 
        if (event.origin !== origin) return;
        if (event.data === "EPAG_FIM") callback();
    }, false);
};