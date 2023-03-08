@props(['id' => ''])
<div id="{{ $id ?: 'banner-720x90-ads' }}" class="mobileHide banner-ads">
    <script type="text/javascript">
        atOptions = {
            'key': 'd9f2fe05fc6cc222e61cb22a256ff36a',
            'format': 'iframe',
            'height': 90,
            'width': 728,
            'params': {}
        };
        document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') +
            '://silldisappoint.com/d9f2fe05fc6cc222e61cb22a256ff36a/invoke.js"></scr' + 'ipt>');
    </script>
</div>
<div id="{{ $id ?: 'banner-320x50-ads' }}" class="mobileShow banner-ads">
    <script type="text/javascript">
        atOptions = {
            'key': 'c00857a461551c33bbda761a987edfad',
            'format': 'iframe',
            'height': 50,
            'width': 320,
            'params': {}
        };
        document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') +
            '://silldisappoint.com/c00857a461551c33bbda761a987edfad/invoke.js"></scr' + 'ipt>');
    </script>
</div>
