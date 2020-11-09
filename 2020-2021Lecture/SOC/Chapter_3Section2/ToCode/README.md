
##ToCode3_2

The objective of this `ToCode3_2` section is to create a Web services composition `(WSC)` composed of two(2) Web services : `WS1` and `WS2`. <br>

  - `WS1`: is a Web service you have to implement yourself.
  - `WS2`: is a Web service you have to choose from internet, then, write a client against `WS2`.
  - `WS1` and `WS2` are to be invoked sequentially by a Web interface transparently.

Sample scenarios you can consider :

  - `WS1`  makes a fictive travel reservation for a customer. The total amount will be returned in TND. `WS2` will provide a reservation confirmation with the total amount in  another currency, for instance USD.  

  - `WS1` lets a user choose a preferred vacation destination, and `WS2`, will provide the user with the weather forecast, for the designated destination and date.

> Step 1

Implement a SOAP web service (bottom-up approach)-- we will call it `WS1`.<br>
   -  Write a  PHP web service using NUSOAP library. Your web service should have at least (2)two methods. one of them having a table as input/output. Your generated WSDL file should define at least one complex data type.
   - Write a client in PHP to your Web service (one of the (2)two methods).  

Implement a SOAP web service (Top-down approach) -- we will call it `WS-TD`.
    - Write another PhP web services. Your web service should have one method.  
    - Write a client in PHP to your Web service.

> Step 2

Search for your `WS2` : it should supports SOAP-based invocation. Test the web service and write a client.

> Step 3  

Write a client for `WS1` and `WS2`. 
Hint: The output of `WS1` must be an input to `WS2`.

> Step 4

Call `WS1` and `WS2` composition using a Web interface.

> What to submit ?

-Create a folder and name it `ToCode3_2`. Create four(4) subfolders named : `WS1`, `WS2`, `WS-TD`, and `WSC`. 
- Store the source code, of the WS and the client of each WS. Add  SOAPUI tests of you `WS1`, `WS2`, and `WS-TD` (print screens). 
- Store the source code of the composition in `WSC` with print screen of its execution interface with results. You may add an explanatory description of your composition with each web service methods, input and output parameters.

- Push your  `ToCode3_2` to your `GIT` repository.  
- Send the following on Microsoft Teams : Link of your git repository.  

## Additional resources: 

Several web services WSDL files : 
- 🔗 [Google Ads](https://developers.google.com/adwords/api/docs/guides/call-structure) - 
   [https://adwords.google.com/api/adwords/cm/v201809/CampaignService?wsdl](https://adwords.google.com/api/adwords/cm/v201809/CampaignService?wsdl)
- 🔗 [EbaY](http://developer.ebay.com) - 
   [http://developer.ebay.com/webservices/latest/ebaySvc.wsdl](http://developer.ebay.com/webservices/latest/ebaySvc.wsdl)
- 🔗 PayPAL - [https://www.paypalobjects.com/wsdl/paypalsvc.wsdl](https://www.paypalobjects.com/wsdl/paypalsvc.wsdl)
- 🔗 [National Digital Forecast Database (NDFD)](http://www.nws.noaa.gov/xml/) - 
[http://www.weather.gov/forecasts/xml/DWMLgen/wsdl/ndfdXML.wsdl](http://www.weather.gov/forecasts/xml/DWMLgen/wsdl/ndfdXML.wsdl)
- 🔗 UPS Developer Kit APIs - [https://www.ups.com/cd/en/help-center/technology-support/developer-resource-center/ups-developer-kit/about.page?](https://www.ups.com/cd/en/help-center/technology-support/developer-resource-center/ups-developer-kit/about.page?)
- 🔗 [Flightaware](https://flightaware.com/commercial/flightxml/v3/documentation.rvt) - 
[http://flightxml.flightaware.com/soap/FlightXML3/wsdl](http://flightxml.flightaware.com/soap/FlightXML3/wsdl)


Several Web services web sites :

- 🔗 [API directory](https://www.programmableweb.com/)
- 🔗 [A directory of free web services](https://www.free-web-services.com/)
- 🔗 [Collection of public APIs](https://explore.postman.com/templates)
- 🔗 [Financial web services](http://www.xignite.com/)
- 🔗 [SMS, voice, phone and address verification APIs](http://www.cdyne.com)
- 🔗 [Ebay shopping API](https://developer.ebay.com/devzone/shopping/docs/Concepts/ShoppingAPIGuide.html)
- 🔗 [List of weather related and financial web services](http://sofa.uqam.ca/soda/webservices.php)


© By Dr. Neila BEN LAKHAL.
