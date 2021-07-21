class Auth
{
    constructor()
    {
        this.store = {
            setItem: (key, val) => {
                window.localStorage.setItem(window.btoa(key), window.btoa(JSON.stringify(val)));
            },

            getItem: (key) => {
                if (Object.prototype.hasOwnProperty.call(window.localStorage, window.btoa(key))) {
                    return JSON.parse(window.atob(window.localStorage.getItem(window.btoa(key))));
                } else {
                    return undefined;
                }
            },

            removeItem: (key) => {
                return window.localStorage.removeItem(window.btoa(key));
            },

            clear: () => { return window.localStorage.clear(); }
        };

        this.validated = false;
    }

    get authorized()
    {
        return this.store.getItem('authorized');
    }

    get identifier()
    {
        return this.store.getItem('identifier');
    }

    get mode()
    {
        return this.store.getItem('mode');
    }

    get module()
    {
        return this.store.getItem('module');
    }

    get modules()
    {
        return this.store.getItem('modules');
    }

    get profile()
    {
        return this.store.getItem('profile');
    }

    hasKey(key)
    {
        let exists = this.store.getItem(key);

        if (exists) {
            return true;
        }

        return false;
    }

    setItem(key, val)
    {
        this.store.setItem(key, val);
    }

    getItem(key)
    {
        return this.store.getItem(key);
    }

    clear()
    {
        Object.keys(window.localStorage).forEach(key => {
            if (key === 'YXBwc0luZm8=' || key === 'YnJlYWtwb2ludA==') {
                return;
            }

            window.localStorage.removeItem(key);
        });
    }
}

export default new Auth();