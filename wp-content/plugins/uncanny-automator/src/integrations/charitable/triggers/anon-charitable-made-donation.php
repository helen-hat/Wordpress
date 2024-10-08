<?php

namespace Uncanny_Automator\Integrations\Charitable;

/**
 * Class ANON_CHARITABLE_MADE_DONATION
 */
class ANON_CHARITABLE_MADE_DONATION extends \Uncanny_Automator\Recipe\Trigger {

	/**
	 * Charitable_Integration Instance.
	 *
	 * @var object
	 */
	private $charitable;

	/**
	 * Anonymous trigger that will fire even if no user is logged in.
	 *
	 * @return void
	 */
	protected function setup_trigger() {

		$this->charitable = array_shift( $this->dependencies );

		$this->set_trigger_type( 'anonymous' );
		$this->set_integration( 'CHARITABLE' );
		$this->set_trigger_code( 'ANON_MADE_DONATION' );
		$this->set_trigger_meta( 'POST' );
		$this->set_sentence( esc_attr__( 'A donation is made', 'uncanny-automator' ) );
		$this->set_readable_sentence( esc_attr__( 'A donation is made', 'uncanny-automator' ) );
		$this->add_action( 'automator_charitable_donation_made', 10, 1 );

	}

	/**
	 * Validate Trigger.
	 *
	 * @param array $trigger
	 * @param array $hook_args
	 *
	 * @return bool
	 */
	public function validate( $trigger, $hook_args ) {
		return $this->charitable->helpers()->validate_approved_donation( $hook_args[0] ) ? true : false;
	}

	/**
	 * Define Tokens.
	 *
	 * @param array $tokens
	 * @param array $trigger - options selected in the current recipe/trigger
	 *
	 * @return array
	 */
	public function define_tokens( $trigger, $tokens ) {
		return array_merge( $tokens, $this->charitable->helpers()->get_donation_tokens_config() );
	}

	/**
	 * Hydrate Tokens.
	 *
	 * @param array $trigger
	 * @param array $hook_args
	 *
	 * @return array
	 */
	public function hydrate_tokens( $trigger, $hook_args ) {
		return $this->charitable->helpers()->hydrate_donation_tokens( $hook_args[0] );
	}

}
