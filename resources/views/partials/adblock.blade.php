<script>
    checkAdblock();

    async function checkAdblock() {
        let isBlocked = await this.CheckAdBlockByScript();
        console.log('checking adblock', isBlocked);
        if (isBlocked) {
            $('.page-content').hide();
            $('.adblock').show();
        }
    }
    async function CheckAdBlockByScript() {
        let status = false;
        let url = "https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js";
        const config = {
            method: "HEAD",
            mode: "no-cors",
        };
        let request = new Request(url, config);
        try {
            let a = await fetch(request);
            status = false;
        } catch (error) {
            status = true;
            return status;
        }
        return status;
    }
</script>
