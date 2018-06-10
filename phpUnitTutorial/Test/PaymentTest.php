<?php

namespace phpUnitTutorial\Test;

use phpUnitTutorial\Payment;

class PaymentTest extends \PHPUnit\Framework\TestCase {

	public function testProcessPaymentReturnsTrueOnSuccessfulPayment() {
		$paymentDetails = array(
			'amount'   => 123.99,
			'card_num' => '4111-1111-1111-1111',
			'exp_date' => '03/2013',
		);

		$response = new \stdClass();
		$response->approved = true;
		$response->transaction_id = 123;

		$payment = new Payment();

		$authorizeNet = $this->getMockBuilder('\AuthorizeNetAIM')
			->setConstructorArgs(array($payment::API_ID, $payment::TRANS_KEY))
			->getMock();

		$authorizeNet->expects($this->once())
			->method('authorizeAndCapture')
			->will($this->returnValue($response));

		$result = $payment->processPayment($authorizeNet, $paymentDetails);

		$this->assertTrue($result);
	}

}
