<div x-data="{ showHtml: false, content: 'Content' }" x-init="content = document.documentElement.outerHTML">
    <button x-on:click="showHtml = !showHtml">Toggle HTML</button>
    <a href="/download/css">Download CSS</a>
    <div x-show="showHtml" x-text="content"></div>
</div>