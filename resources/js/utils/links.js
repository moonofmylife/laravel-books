(function() {
    let likeRoR =  {
        boot: function() {
            document
                .querySelectorAll('a[data-method]:not([data-method=""])')
                .forEach(e => e.addEventListener('click', this.prepare));
        },

        prepare: async function(event) {
            event.preventDefault();

            let link = event.target;

            if (link.tagName !== 'A') {
                link = likeRoR.findParent('A', link);
            }

            const method = link.getAttribute('data-method');
            const message = link.getAttribute('data-confirm');
            const form = likeRoR.form(method, link);

            if (UIkit !== undefined && message && !await likeRoR.confirm(message, link)) {
                return false;
            }

            return form.submit();
        },

        form: function(method, link) {
            let form = document
                .createElement('form');

            form.setAttribute('method', 'POST');
            form.setAttribute('action', link.getAttribute('href'));

            const _token = document
                .createElement('input');

            _token.setAttribute('type', 'hidden');
            _token.setAttribute('name', '_token');
            _token.setAttribute('value', csrfToken);

            const _method = document
                .createElement('input');

            _method.setAttribute('type', 'hidden');
            _method.setAttribute('name', '_method');
            _method.setAttribute('value', method);

            form.append(_token, _method);

            document.querySelector('body').appendChild(form);

            return form;
        },

        confirm: function(message, link) {
            return UIkit.modal.confirm(message, {
                labels: {
                    cancel: link.getAttribute('data-cancel') || 'Cancel',
                    ok: link.getAttribute('data-ok') || 'Ok'
                }
            })
                .then(() => { return true }, () => { return false })
                .catch(() => { });
        },

        findParent: function(tag, elem) {
            let lastElement = elem.parentNode;

            while (lastElement.tagName !== String(tag).toUpperCase()) {
                lastElement = lastElement.parentNode;
            }

            return lastElement;
        },
    }

    likeRoR.boot();
})();
