<?php include TEMPLATE_PATH."header2.tpl.php"?>


<table width="800" height="600" align="center" border="2" cellpadding="5" cellspacing="5">
<tr><td ><br>
The Model for Financial Analysis of Electric Sector Expansion Plans (FINPLAN) is used for financial<br>
analysis of electricity generation projects by taking into account financing sources, expenditures, revenues,<br>
taxes, interest rates and weighted average capital costs, etc. Since financial constraints are often the biggest<br>
obstacle to implementing an optimal energy strategy, the model is particularly helpful for exploring the<br>
long term financial viability of projects by preparing cash flows, income statements, balance sheets and<br>
financial ratios.<br><br>

<b>Change Log (04.12.2017)</b><br>
<b>Bug fixes, including</b>:<br>
<ul>
<li>Export credit: fixed export credit calculations for multiple plants</li>
</ul>
<b>Change Log (20.01.2017)</b><br>
<b>Bug fixes, including</b>:<br>
<ul>
<li>Decomissioning: corrected yearly payments; corrected payment period in 'Intermediate Results'</li>
<li>General plant data: included checks to ensure construction period is within modelling period</li>
<li>Sales and purchase data: ensured fixed quantities and data entry for very first year are treated correctly in 'Intermediate Results'</li>
<li>Cash inflows and outflows: corrected calculation of 'Cash Available (VAT)' for very first year</li>
</ul>
<b>Improved functionality, including</b>:<br>
<ul>
<li>General information: introduced warning to update all input data when changing start year of modelling period</li>
<li>Sales and purchase data: allowed entering data immediately when selecting 'Fixed' without the need to press save first</li>
<li>Plant data: included warning if yearly investment distribution does not add up to 100%</li>
</ul>
<b>Editorial fixes, including</b>:<br>
<ul>
<li>Decommissioning: clarified if amount is saved in external trust or internal fund throughout FINPLAN entry and output fields</li>
<li>Tax information: clarified the use of the depreciation method for existing assets</li>
</ul>

<b>Change Log (21.09.2016)</b><br>
<b>Bug fixes, including</b>:<br>
<ul>
<li>Power plant related costs: corrected the number of years data can be entered; ensured they are not accounted for in the results beyond the plant's lifetime</li>
<li>Export credit: corrected the interest rate applied when selecting Floating; corrected the repayments when selecting Floating and Uniform (P+I)</li>
<li>Sales and purchase data: allowed to correctly consider multiple clients for sales and purchase data; ensured consistency in the calculations</li>
<li>Depreciation: ensured the switch works correctly when choosing declining switching to linear; corrected the depreciation rate applied</li>
<li>Project loans: allowed to enter a fixed interest rate</li>
<li>Project finance analysis: corrected calculation of maximum project finance during project life</li>
<li>Financial ratios: improved and corrected calculations and warning messages</li>
</ul>
<b>Improved functionality, including:</b>
<ul>
<li>Allowed exporting all results with one click</li>
<li>Improved navigation through the menu</li>
<li>Included version number and this change history</li>
<li>Enabled function to enter consumer contributions and deposits (do not yet appear in cash flow statement)</li>
</ul>
<b>Editorial fixes, including:</b>
<ul>
<li>Sales and purchase data: improved data entry and standard settings; immediate data entry checks and warnings to avoid error messages during the calculations</li>
<li>Export credit: clarified if value for constant or floating interest is used</li>
<li>Updated list of currencies</li>
<li>Clearly spelled out the units used and updated header text based on the units chosen</li>
<li>Clarified terms and adding explanatory text</li>
<li>Corrected spelling mistakes</li>
<li>Improved formatting</li>
</ul>

</table>
