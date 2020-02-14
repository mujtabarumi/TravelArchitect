
function addSelect2Ajax($element, $url, $changeCallback, data) {
    var placeHolder = $($element).data('placeholder');

    if (typeof $changeCallback == 'function') {
        $($element).change($changeCallback)
    }

    return $($element).select2({
        ...data,
        placeholder: placeHolder,
        ajax: {
            url: $url,
            data: function (params) {
                return {
                    keyword: params.term,
                }
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (obj, index) {
                        return {id: obj.id, text: obj.name};
                    })
                };
            }
        }
    });

}

function addSelect2AjaxExp($element, $url, $changeCallback, data) {
    var placeHolder = $($element).data('placeholder');

    if (typeof $changeCallback == 'function') {
        $($element).change($changeCallback)
    }

    return $($element).select2({
        ...data,
        placeholder: placeHolder,
        ajax: {
            url: $url,
            data: function (params) {
                return {
                    keyword: params.term,
                }
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (obj, index) {
                        return {id: obj.value, text: obj.text};
                    })
                };
            }
        }
    });

}

function addMultipleSelect2Ajax($el, $url, $changeCallback, data) {
    $($el).each(function (index, $element) {
        var placeHolder = $($element).data('placeholder');
        if (typeof $changeCallback == 'function') {
            $($element).change($changeCallback)
        }

        return $($element).select2({
            ...data,
            placeholder: placeHolder,
            ajax: {
                url: $url,
                data: function (params) {
                    return {
                        keyword: params.term,
                    }
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (obj, index) {
                            return {id: obj.name, text: obj.name};
                        })
                    };
                }
            }
        });

    });

}

const ModalMetaData = {
    selector: "[data-meta-modal]",

    init: function () {
        this.openModal();
        this.saveData();
    },

    reInit: function () {
        $(this.selector).unbind('click');
        this.openModal();
    },

    openModal: function () {
        $(this.selector).click(function (e) {
            e.preventDefault();
            var placeholder = $(this).data('meta-modal-placeholder') || "Type a name";
            var targetId = $(this).data('meta-modal');
            var hasParent = Boolean($(this).data('meta-parent') || false);

            $(targetId).find('#input-meta-data').val("");
            $(targetId).find('#input-meta-data').attr("placeholder", placeholder);
            $(targetId).find('.modal-title').html($(this).data('meta-modal-title'));

            $(targetId).find('#save-meta-data').attr("data-meta-type", $(this).data('meta-modal-type'));
            $(targetId).find('#save-meta-data').attr("data-meta-url", $(this).data('meta-modal-url'));
            $(targetId).find('#save-meta-data').attr("data-meta-option-id", $(this).data('meta-option-id'));
            $(targetId).find('#save-meta-data').attr("data-meta-modal", targetId);
            $(targetId).find('#save-meta-data').attr("data-meta-parent", $(this).data('meta-parent'));
            $(targetId).find('#save-meta-data').attr("data-meta-parent-id", $(this).data('meta-parent-id'));

            if (hasParent) {
                var parent = $(this).data('meta-parent');
                var parentId = $(this).data('meta-parent-id');
                var parentVal = $(parentId).val() || "";
                if (parentVal.length > 0) {

                } else {
                    toastr.error("Please select " + parent + " first");
                    return 0;
                }

            }

            $(targetId).modal('show');
        });
    },
    saveData: function () {
        var myObj = this;
        $('#save-meta-data').click(function (e) {
            e.preventDefault();
            var type = $(this).attr('data-meta-type');
            var url = $(this).attr('data-meta-url');
            var name = $('#input-meta-data').val();
            var optionId = $(this).attr('data-meta-option-id');
            var targetId = $(this).attr('data-meta-modal');
            var hasParent = Boolean($(this).attr('data-meta-parent') || false);
            var parentId = $(this).attr('data-meta-parent-id');
            var parentVal = $(parentId).val() || "";
            var thisElement = $(this);

            let data = {
                'name': name,
                'type': type
            };

            if (hasParent) {
                data['parent_id'] = parentVal;
            }


            if (name.length > 3) {
                $.post(url, data, function (e) {
                    if (e.success) {
                        var newOptions = new Option(e.data.text, e.data.value, true, true);
                        $(optionId).append(newOptions).trigger('change');
                        $(targetId).modal('hide');
                        toastr.success("Successfully added");
                        myObj.resetModalAttr(thisElement);
                    }
                })
            } else {
                toastr.error("Please type a valid name");
            }
        })
    },
    resetModalAttr: function (e) {
        ['data-meta-type', 'data-meta-option-id', 'data-meta-parent', 'data-meta-parent-id'].map((a) => {
            $(e).attr(a, "");
        });
        $('#input-meta-data').val("");
    }
};


$(function () {
    ModalMetaData.init();
});

(function($) {
    $.fn.ForceNumericOnly =
        function() {
            return this.each(function()
            {
                $(this).keydown(function(e)
                {
                    var key = e.charCode || e.keyCode || 0;
                    // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
                    // home, end, period, and numpad decimal
                    return (
                        key == 8 ||
                        key == 9 ||
                        key == 13 ||
                        key == 46 ||
                        key == 110 ||
                        key == 190 ||
                        (key >= 35 && key <= 40) ||
                        (key >= 48 && key <= 57) ||
                        (key >= 96 && key <= 105));
                });
            });
        };
}(jQuery));

// copy to clipboard
const copyToClipboard = str => {
    const el = document.createElement('textarea');
    el.value = str;
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);
};
