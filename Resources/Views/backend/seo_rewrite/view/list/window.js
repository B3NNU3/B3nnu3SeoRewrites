
Ext.define('Shopware.apps.SeoRewrite.view.list.Window', {
    extend: 'Shopware.window.Listing',
    alias: 'widget.Rewrite-list-window',
    height: 450,
    title : '{s name=window_title}Rewrite listing{/s}',

    configure: function() {
        return {
            listingGrid: 'Shopware.apps.SeoRewrite.view.list.Rewrite',
            listingStore: 'Shopware.apps.SeoRewrite.store.Rewrite'
        };
    }
});