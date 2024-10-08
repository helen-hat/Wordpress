class AutomatorBrevoSettings {
    constructor() {
        // Register Event Listeners.
		this.registerEventListeners();
    }

	/**
     * Register Transient Sync event handlers.
     *
     * @return {void}
     */
	registerEventListeners() {

		// listen for click events on buttons with class 'uap-brevo-transient-sync-refresh'
		document.querySelectorAll('.uap-brevo-transient-sync-refresh').forEach(($button) => {
			$button.addEventListener('click', () => {
				this.doTransientSync($button);
			});
		});
	}

	/**
	 * Start local sync.
	 *
	 * @param {HTMLElement} $button
	 * @return {void}
	 */
	doTransientSync( $button ) {

		$button.setAttribute('loading', true);
		const $wrapper = $button.closest('.uap-brevo-transient-sync-wrapper');
		const $count = $wrapper.querySelector('.uap-brevo-sync-items-count');
		const key = $button.dataset.key;

		_uo.utility.fetchData({
			url: UncannyAutomatorBackend.ajax.url,
			data: {
				action: 'automator_brevo_sync_transient_data',
				nonce: UncannyAutomatorBackend.ajax.nonce,
				key: key,
			},
			onSuccess: (response) => {
				console.info(response);
				$button.removeAttribute('loading');
				$count.innerHTML = response.data.count;
			},
			onFail: (response, message) => {
				console.warn(message);
				$button.removeAttribute('loading');
			},
		});
	}
}

new AutomatorBrevoSettings();