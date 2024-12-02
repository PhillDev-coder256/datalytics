import requests
import pandas as pd
import plotly.express as px

# API Endpoint
url = "https://statex.ipsos.co.ug/index.php/data_api/logs_data"

# Fetch data from the API
response = requests.get(url)

# Check for a successful response
if response.status_code == 200:
    data = response.json()
    df = pd.DataFrame(data)
    
    # Data Preprocessing
    df['date'] = pd.to_datetime(df['date'], format='%d-%m-%Y')
    df['time'] = pd.to_datetime(df['time'], format='%H:%M:%S').dt.time
    
    # Example: Creating Adverts by Radio chart
    fig_adverts = px.bar(df, x='time', y='commercials_Name', color='media', title="Adverts by Radio")
    fig_adverts.show()

    # ... add other visualization code for "Radios by Region" and "Adverts My Month"
    # ... and table visualization (see previous examples)

else:
    print(f"Error fetching data: {response.status_code}")