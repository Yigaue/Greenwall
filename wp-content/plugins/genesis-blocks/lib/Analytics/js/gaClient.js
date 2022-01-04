(function () {
	window.dataLayer = window.dataLayer || [];

	/**
	 * Ensures that the provided function isn't called
	 * multiple times in succession.
	 *
	 * @param {() => any} func
	 * @param {number} wait
	 *
	 * @returns {() => void}
	 */
	const debounce = (func, wait) => {
		let timeout;
		return function executedFunction(...args) {
			const later = () => {
				clearTimeout(timeout);
				func(...args);
			};

			clearTimeout(timeout);
			timeout = setTimeout(later, wait);
		};
	};

	/**
	 * Genesis Analytics Client
	 *
	 * @note Follows the singleton pattern to prevent multiple instances of the GA Client from being used.
	 * @doc https://developers.google.com/analytics/devguides/collection/gtagjs
	 */
	class GAClient {
		/**
		 * Is Google Analytics enabled.
		 *
		 * @type {boolean}
		 */
		enabled = false;

		/**
		 * Google Analytics Client
		 *
		 * @type {Object}
		 */
		client;

		/**
		 * Google Analytics Measurment ID
		 *
		 * @type {string}
		 */
		GA_ID = "UA-17364082-14";

		/**
		 * Class constructor
		 */
		constructor() {
			this.client = function () {
				window.dataLayer.push(arguments);
			};

			this.config = window.genesisAnalyticsConfig || {};
			if (this.config.ga_opt_in) {
				this.enableAnalytics(this.config.ga_opt_in);
				this.initClient();
			}
		}

		/**
		 * Enables Google Analytics
		 * Setting this value allows the GA Client to respect any opt out configuration
		 *
		 * @doc https://developers.google.com/analytics/devguides/collection/gtagjs/user-opt-out
		 *
		 * @param {boolean | number | string} enable The value to be set
		 */
		enableAnalytics(enable) {
			enable = !!+enable;

			if (enable) {
				// Remove ga-disable-GA_MEASUREMENT_ID property to enable GA
				delete window[`ga-disable-${this.GA_ID}`];
			} else {
				// Set ga-disable-GA_MEASUREMENT_ID property to disable GA
				window[`ga-disable-${this.GA_ID}`] = "1";
			}
			this.enabled = enable;
		}

		/**
		 * Sets up the initial values of the Google Analytics client.
		 */
		initClient() {
			this.client("js", new Date());
			this.client("config", this.GA_ID, { send_page_view: false });
		}

		/**
		 * Sends an event to Google Analytics
		 *
		 * @param {string} action
		 * @param {{event_category: string; event_label?: string;}} params
		 */
		send(action, params) {
			if (this.enabled) {
				this.client("event", action, params);
			}
		}

		/**
		 * Creates a debounced copy of send method
		 */
		sendDebounce = debounce(this.send.bind(this), 500);

		/**
		 * Attaches the currently selected block name to the send parameters.
		 * If no event_label is provided, then the block name is used as the event_label.
		 *
		 * @param {{action: string; event_category: string; event_label?: string; throttle?: boolean;}} args
		 */
		sendBlockEvent(args) {
			const data = window.wp.data.select("core/block-editor");
			const block = data ? data.getSelectedBlock().name : "Undefined";

			const { throttle, action, ...params } = args;
			params.event_label = params.event_label
				? `${params.event_label} - ${block}`
				: block;

			if (throttle) {
				this.sendDebounce(action, params);
			} else {
				this.send(action, params);
			}
		}
	}

	// Assigns an instantiated class (Singleton pattern) to the Window global object
	window.GenesisAnalytics = {
		debounce,
		GAClient: new GAClient(),
	};
})(window);
