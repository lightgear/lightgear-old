/*global jQuery, document */
/*jslint nomen: true*/

/**
 * Lightgear Toolbar widget.
 */
(function ($) {

    'use strict';

    $.widget('lightgear.toolbar', {

        options: {
            minWidth: null,
            minHeight: null
        },

        _create: function () {
            this.options.minWidth = this.element.outerWidth();

            this._on(this.element, {
                click: 'toggle'
            });

            this._on(this.element.children(), {
                click: '_handleChildrenClick'
            });

        },

        _handleChildrenClick: function (e) {
            e.stopPropagation();
        },

        toggle: function () {
            var instance = this;

            if (this.element.is('.open')) {
                instance.element
                    .removeClass('open')
                    .animate({width: this.options.minWidth}, 600);
            } else {
                this.element.animate({
                    width: '100%'
                }, 600, function () {
                    instance.element.addClass('open');
                });
            }
        }
    });
}(jQuery));
