const hospitalSearchesArray = LGformattedAddresses;
const hospitalLocationsArray = [  LGdata.hospital_location1,
                                  LGdata.hospital_location2,
                                  LGdata.hospital_location3 ];
const hospitalAddressesArray = [];
hospitalAddressesArray.push([ LGdata.hospital_street1,
                              LGdata.hospital_city1,
                              LGdata.hospital_state1,
                              LGdata.hospital_zip1 ]);
hospitalAddressesArray.push([ LGdata.hospital_street2,
                              LGdata.hospital_city2,
                              LGdata.hospital_state2,
                              LGdata.hospital_zip2 ]);
hospitalAddressesArray.push([ LGdata.hospital_street3,
                              LGdata.hospital_city3,
                              LGdata.hospital_state3,
                              LGdata.hospital_zip3 ]);
const hospitalPhonesArray = [ LGdata.hospital_phone1,
                              LGdata.hospital_phone2,
                              LGdata.hospital_phone3 ];
const hospitalHoursArray = [];
hospitalHoursArray.push([ LGdata.mon1,
                          LGdata.tue1,
                          LGdata.wed1,
                          LGdata.thu1,
                          LGdata.fri1,
                          LGdata.sat1,
                          LGdata.sun1 ]);
hospitalHoursArray.push([ LGdata.mon2,
                          LGdata.tue2,
                          LGdata.wed2,
                          LGdata.thu2,
                          LGdata.fri2,
                          LGdata.sat2,
                          LGdata.sun2 ]);
hospitalHoursArray.push([ LGdata.mon3,
                          LGdata.tue3,
                          LGdata.wed3,
                          LGdata.thu3,
                          LGdata.fri3,
                          LGdata.sat3,
                          LGdata.sun3 ]);

function setHospital(index) {
  let hospitalSearch = hospitalSearchesArray[index];
  document.getElementById("location-grid-map").src = "https://www.google.com/maps?&q=" + hospitalSearch + "&output=embed";
  document.getElementById("location-grid-name").innerHTML = hospitalLocationsArray[index];
  document.getElementById("location-grid-address").innerHTML = hospitalAddressesArray[index][0] + "<br>" + hospitalAddressesArray[index][1] + ", "+hospitalAddressesArray[index][2] + " " + hospitalAddressesArray[index][3];
  document.getElementById("location-grid-phone-link").href = "tel:+01-" + hospitalPhonesArray[index];
  document.getElementById("location-grid-phone").innerHTML = hospitalPhonesArray[index];
  document.getElementById("location-grid-mon").innerHTML = hospitalHoursArray[index][0];
  document.getElementById("location-grid-tue").innerHTML = hospitalHoursArray[index][1];
  document.getElementById("location-grid-wed").innerHTML = hospitalHoursArray[index][2];
  document.getElementById("location-grid-thu").innerHTML = hospitalHoursArray[index][3];
  document.getElementById("location-grid-fri").innerHTML = hospitalHoursArray[index][4];
  document.getElementById("location-grid-sat").innerHTML = hospitalHoursArray[index][5];
  document.getElementById("location-grid-sun").innerHTML = hospitalHoursArray[index][6];
}
