

Ext.define('Shopware.apps.SeoRewrite.view.list.Rewrite', {
    extend: 'Shopware.grid.Panel',
    alias:  'widget.Rewrite-listing-grid',
    region: 'center',

    configure: function() {
        return {
            detailWindow: 'Shopware.apps.SeoRewrite.view.detail.Window'
        };
    }
});
