/**
 * TestLink Open Source Project - http://testlink.sourceforge.net/
 * This script is distributed under the GNU General Public License 2 or later.
 *
 * @package TestLink
 * @author Francisco Mancardi
 * @copyright 2009, TestLink community
 * @version CVS: $Id: tcase_utils.js,v 1.2 2010/10/10 13:34:14 franciscom Exp $
 * @filesource http://testlink.cvs.sourceforge.net/viewvc/testlink/testlink/gui/javascript/ext_extensions.js
 * @link http://www.teamst.org
 *
 *
 * Utilities for certain test case actions / operations
 *
 * ----- Development Notes --------------------------------------------------------------
 *
 * @global variables:
 * 	fRoot  -> url to TestLink installation home
 *
 * @internal revisions:
 * 20101010 - franciscom - creation
 **/

/**
 * Check through AJAX call check is name is duplicated
 * If duplicated found -> give visual feedback to user.
 *
 * initaly developed by Eloff
 * refactored to avoid (evil) global coupling
 *
 * int tcase_id: can be 0 when we are creating a new test case
 *               if > 0 we are editing then we can expect to find
 *               a test case with same name (myself).
 *           
 * string tcase_name: name to check
 *
 * int tsuite_id: container where to check for duplicates
 *       
 * string warningOID: HTML Object ID used to give visual feedback to user    
 *
 * globals: fRoot
 *
 * returns: -
 */
function checkTCaseDuplicateName(tcase_id,tcase_name,tsuite_id,warningOID) {
	Ext.Ajax.request({
		url: fRoot+'lib/ajax/checkTCaseDuplicateName.php',
		method: 'GET',
		params: {
			name: tcase_name,
			testcase_id: tcase_id,
			testsuite_id: tsuite_id
		},
		success: function(result, request) {
			var obj = Ext.util.JSON.decode(result.responseText);
			$(warningOID).innerHTML = obj['message'];
		},
		failure: function (result, request) {
		}
	});
}