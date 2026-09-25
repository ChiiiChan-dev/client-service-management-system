# Project Requirements

## Project Title

Client Service and Appointment Management System

## 1. Clients

The system will store:
- Client ID
- Name
- Address
- Contact Information

## 2. Appointments

The system will store:
- Appointment ID
- Client ID
- Reason for Visit
- Appointment Date
- Status

Appointments will only record the date and will not require a specific time.

## 3. Service History

The system will store:
- Service ID
- Client ID
- Service Date
- Service Type
- Device/Appliance
- Diagnostics/Problem
- Service Fee (optional)

The service fee can be left empty when there is no monetary fee recorded or when payment arrangements vary.

## 4. Search

The system will allow users to search for clients using:
- Name
- Contact Information

The user's appointments and service history can be viewed through their client record.

## 5. Basic Relationships

- One client can have multiple appointments.
- One client can have multiple service history records.