<?php
	session_start();


	class Session
	{
		public function set_session($data)
		{
			$_SESSION["user"] = $data;
		}


		public function is_admin()
		{
			if($_SESSION["user"]["role_id"] == 1)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

			public function is_user()
		{
			if($_SESSION["user"]["role_id"] == 2)
			{
				return true;
			}
			else
			{
				return false;
			}
		}


		public function session_exists()
		{
			if(isset($_SESSION["user"]))
			{
				return true;
			}
			else
			{
				header("location: ../user/index.php?message=Login Into Your Account");
			}
		}

		public function destroy_session()
		{
			unset($_SESSION["user"]);

			session_destroy();
		}

	}
?>