<?php

<?php

namespace phpUnitTutorial;

class BadCode
{
	protected $user;

	public function __construct(array $user)
	{
		$this->user = $user;
	}

	public function authorize($password)
	{
		if ($this->checkPassword($password)) {
			return true;
		}

		return false;
	}

	protected function checkPassword($password)
	{
		if (empty($this->user['password']) || $this->user['password'] !== $password) {
			echo 'YOU SHALL NOT PASS';
			$this->callExit();
		}

		return true;
	}

	protected function callExit()
	{
		exit;
	}
}